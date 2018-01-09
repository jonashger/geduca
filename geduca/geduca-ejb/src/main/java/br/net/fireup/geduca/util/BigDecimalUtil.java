package br.net.fireup.geduca.util;

import java.math.BigDecimal;

public class BigDecimalUtil {

	public BigDecimalUtil() {
		// Não poder ser instanciada
	}

	/**
	 * Somar duas BigDecimais com validação se forem nulos
	 * 
	 * @param valorUm
	 *            Primeiro parametro
	 * @param valorDois
	 *            Valor que será somado ao primeiro valor
	 * @return
	 */
	public static BigDecimal somar(BigDecimal valorUm, BigDecimal valorDois) {

		if (isNullOrEmpty(valorUm) || isNullOrEmpty(valorDois)) {
			return BigDecimal.ZERO;
		}

		return valorUm.add(valorDois);

	}

	/**
	 * Valida se o objeto é nulo ou está vazio
	 * 
	 * @param valor
	 *            Big decimal a ser validado
	 * @return
	 */
	public static Boolean isNullOrEmpty(BigDecimal valor) {

		if (valor == null) {
			return Boolean.TRUE;
		}
		return Boolean.FALSE;

	}

	/**
	 * Método que subtrai dois BigDecimais
	 * 
	 * @param valorUm
	 *            Primeiro valor que será passado
	 * @param valorDois
	 *            Valor que será subtraido do primeiro valor
	 * @return
	 */
	public static BigDecimal subtrair(BigDecimal valorUm, BigDecimal valorDois) {
		if (isNullOrEmpty(valorUm) || isNullOrEmpty(valorDois)) {
			return BigDecimal.ZERO;
		}
		return valorUm.subtract(valorDois);
	}

	/**
	 * Método que multiplica dois BigDecimais
	 * 
	 * @param valorUm
	 *            Primeiro valor que será passado
	 * @param valorDois
	 *            Valor que será multiplicaod pelo primeiro valor
	 * @return
	 */
	public static BigDecimal multiplicar(BigDecimal valorUm, BigDecimal valorDois) {
		if (isNullOrEmpty(valorUm) || isNullOrEmpty(valorDois)) {
			return BigDecimal.ZERO;
		}
		return valorUm.multiply(valorDois);
	}

	/**
	 * Método que divide dois BigDecimais
	 * 
	 * @param valorUm
	 *            Primeiro valor que será passado
	 * @param valorDois
	 *            Valor que será dividio pelo primeiro valor
	 * @return
	 */

	public static BigDecimal dividir(BigDecimal valorUm, BigDecimal valorDois) {
		if (isNullOrEmpty(valorUm) || isNullOrEmpty(valorDois)) {
			return BigDecimal.ZERO;
		}
		return valorUm.divide(valorDois);
	}
}
