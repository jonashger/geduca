package br.net.fireup.geduca.util;

import java.util.logging.Logger;

import javax.enterprise.inject.Produces;
import javax.enterprise.inject.spi.InjectionPoint;

import br.net.fireup.geduca.annotation.LoggerUtil;

public class LoggerProducer {
	/**
	 * @param injectionPoint
	 * @return logger
	 */
	@LoggerUtil
	@Produces
	public Logger produceLogger(InjectionPoint injectionPoint) {
		return Logger.getLogger(injectionPoint.getMember().getDeclaringClass().getName());
	}
}
