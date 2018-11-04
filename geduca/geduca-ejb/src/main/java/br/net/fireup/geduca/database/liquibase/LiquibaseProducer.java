package br.net.fireup.geduca.database.liquibase;

import java.net.SocketException;
import java.net.UnknownHostException;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;

import javax.annotation.Resource;
import javax.enterprise.context.ApplicationScoped;
import javax.enterprise.context.Initialized;
import javax.enterprise.event.Observes;
import javax.enterprise.inject.Produces;
import javax.sql.DataSource;

import br.net.fireup.geduca.util.ListUtil;
import liquibase.Contexts;
import liquibase.LabelExpression;
import liquibase.Liquibase;
import liquibase.configuration.GlobalConfiguration;
import liquibase.configuration.LiquibaseConfiguration;
import liquibase.database.Database;
import liquibase.database.DatabaseFactory;
import liquibase.database.jvm.JdbcConnection;
import liquibase.exception.DatabaseException;
import liquibase.exception.LiquibaseException;
import liquibase.exception.UnexpectedLiquibaseException;
import liquibase.integration.cdi.CDILiquibaseConfig;
import liquibase.integration.cdi.annotations.LiquibaseType;
import liquibase.logging.LogFactory;
import liquibase.resource.ClassLoaderResourceAccessor;
import liquibase.resource.ResourceAccessor;
import liquibase.util.LiquibaseUtil;
import liquibase.util.NetUtil;

public class LiquibaseProducer {
	private final liquibase.logging.Logger log = LogFactory.getInstance().getLog();

	@Resource(lookup = "java:/geduca")
	private DataSource myDataSource;
	private boolean shouldRun;

	private Liquibase liquibase;
	private CDILiquibaseConfig config;

	@Produces
	@LiquibaseType
	public CDILiquibaseConfig createConfig() {
		config = new CDILiquibaseConfig();
		config.setChangeLog("db/changeLog.xml");
		return config;
	}

	public void iniciarLiquibase() {
		log.info("Iniciando Liquibase " + LiquibaseUtil.getBuildVersion());
		try {

			liquibase = createLiquibase(myDataSource);
		} catch (LiquibaseException | SQLException e) {
			throw new UnexpectedLiquibaseException(e);
		}
		this.shouldRun = checkIfLiquibaseShouldRun();
	}

	private Liquibase createLiquibase(DataSource c) throws LiquibaseException, SQLException {
		if (c == null) {
			return null;
		}
		Liquibase liquibase;
		try (Connection conn = c.getConnection()) {
			liquibase = new Liquibase(config.getChangeLog(), create(), createDatabase(conn));
		}

		if (config.getParameters() != null) {
			for (Map.Entry<String, String> entry : config.getParameters().entrySet()) {
				this.liquibase.setChangeLogParameter(entry.getKey(), entry.getValue());
			}
		}
		return liquibase;
	}

	protected void performUpdate(@Observes @Initialized(ApplicationScoped.class) Object ignored)
			throws LiquibaseException {
		createConfig();
		iniciarLiquibase();
		performUpdate();
	}

	void performUpdate() throws LiquibaseException {
		if (!shouldRun) {
			return;
		}
		List<String> schemas = new ArrayList<>();
		// TODO ADQUIRIR SCHEMAS OU CONEXÕES
		schemas.add("schema1");
		schemas.add("schema2");

		if (ListUtil.isNullOrEmpty(schemas)) {
			performUpdate(liquibase, config.getDefaultSchema());
		} else {
			for (String schema : schemas) {
				performUpdate(liquibase, schema);
			}
		}
	}

	private void performUpdate(Liquibase liquibase, String schema) throws LiquibaseException {
		log.info("*********************** ATUALIZAÇÃO DA SCHEMA: " + schema + "    ***********************");

		Connection conn = null;
		try {
			conn = myDataSource.getConnection();
			liquibase.getDatabase().setConnection(new JdbcConnection(conn));
			liquibase.getDatabase().setDefaultSchemaName(schema);
			if (config.isDropFirst()) {
				liquibase.dropAll();
			}
			liquibase.update(new Contexts(config.getContexts()), new LabelExpression(config.getLabels()));
		} catch (SQLException e) {
			throw new DatabaseException(e);
		} finally {
			if (liquibase != null && liquibase.getDatabase() != null) {
				liquibase.getDatabase().close();
			} else if (conn != null) {
				try {
					conn.rollback();
					conn.close();
				} catch (SQLException e) {
					// nothing to do
				}
			}
		}
	}

	@Produces
	@LiquibaseType
	public DataSource createDataSource() throws SQLException {
		return myDataSource;
	}

	@Produces
	@LiquibaseType
	public ResourceAccessor create() {
		return new ClassLoaderResourceAccessor(getClass().getClassLoader());
	}

	private boolean checkIfLiquibaseShouldRun() {
		String hostName = "unknown";
		try {
			hostName = NetUtil.getLocalHostName();
		} catch (UnknownHostException | SocketException e) {
			log.warning("Cannot find hostname: " + e.getMessage(), e);
		}

		LiquibaseConfiguration liquibaseConfiguration = LiquibaseConfiguration.getInstance();
		boolean shouldRun = liquibaseConfiguration.getConfiguration(GlobalConfiguration.class).getShouldRun();
		if (!this.shouldRun) {
			log.info(
					"Liquibase não está rodando em "
							+ hostName + " porque " + liquibaseConfiguration
									.describeValueLookupLogic(GlobalConfiguration.class, GlobalConfiguration.SHOULD_RUN)
							+ " esta atribuido como false");
		}
		return shouldRun;
	}

	private Database createDatabase(Connection c) throws DatabaseException {
		Database database = DatabaseFactory.getInstance().findCorrectDatabaseImplementation(new JdbcConnection(c));
		if (config.getDefaultSchema() != null) {
			database.setDefaultSchemaName(config.getDefaultSchema());
		}
		return database;
	}

}