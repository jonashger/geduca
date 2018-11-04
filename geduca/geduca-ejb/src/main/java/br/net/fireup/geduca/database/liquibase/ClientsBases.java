package br.net.fireup.geduca.database.liquibase;

public class ClientsBases {

	public ClientsBases(Long id, String host, String user, String senha, String schema, String database,
			String tenant) {
		super();
		this.id = id;
		this.host = host;
		this.user = user;
		this.senha = senha;
		this.database = database;
		this.schema = schema;
		this.tenant = tenant;
	}

	private Long id;
	private String host;
	private String user;

	public String getDatabase() {
		return database;
	}

	public void setDatabase(String database) {
		this.database = database;
	}

	private String database;

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	private String senha;
	private String schema;
	private String tenant;

	public String getHost() {
		return host;
	}

	public void setHost(String host) {
		this.host = host;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getSenha() {
		return senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}

	public String getSchema() {
		return schema;
	}

	public void setSchema(String schema) {
		this.schema = schema;
	}

	public String getTenant() {
		return tenant;
	}

	public void setTenant(String tenant) {
		this.tenant = tenant;
	}
}
