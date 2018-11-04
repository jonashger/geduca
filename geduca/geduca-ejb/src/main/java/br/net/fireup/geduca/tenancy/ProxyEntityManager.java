package br.net.fireup.geduca.tenancy;

import java.lang.reflect.Proxy;
import java.util.logging.Logger;

import javax.enterprise.context.RequestScoped;
import javax.enterprise.inject.Produces;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.annotation.LoggerUtil;

/**
 * This EntityManager producer returns always a Proxy. All the EntityManager
 * methods are wrapped by this proxy. This ensures, that the real EntityManager
 * is obtained/created at call time, not in injection time and can react to
 * Tenant changes between injection and EM method call.
 */
@RequestScoped
public class ProxyEntityManager {

	/**
	 * Provider of EntityManagerFactory.
	 *
	 * @see TenantRegistry#getTenant(String)
	 * @see TenantRegistry#createEntityManagerFactory(Tenant)
	 */
	@Inject
	private TenantRegistry tenantRegistry;

	@Inject
	@LoggerUtil
	private Logger logger;

	/**
	 * CDI Producer. Checks if there is a tenant name in ThreadLocal storage
	 * {@link TenantHolder}. If yes, load tenant from {@link TenantRegistry}, get
	 * its EntityManagerFactory. From the factory create new EntityManager, join JTA
	 * transaction and return this EntityManager.
	 *
	 * @return EntityManager for Tenant or default EntityManager, if no tenant
	 *         logged in.
	 */
	@Produces
	public EntityManager getEntityManager() {
		final String currentTenant = TenantHolder.getCurrentTenant();

		final EntityManager target;

		logger.info("Returning connection for tenant " + currentTenant);
		target = tenantRegistry.getEntityManagerFactory(currentTenant).createEntityManager();

		return (EntityManager) Proxy.newProxyInstance(this.getClass().getClassLoader(),
				new Class<?>[] { EntityManager.class }, (proxy, method, args) -> {
					return method.invoke(target, args);
				});
	}
}
