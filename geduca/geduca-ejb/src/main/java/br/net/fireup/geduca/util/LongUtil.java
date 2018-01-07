package br.net.fireup.geduca.util;

public class LongUtil {

	public static Long UM = 1L;
	public static Long DOIS = 2L;
	public static Long TRES = 3L;
	public static Long QUATRO = 4L;
	public static Long CINCO = 5L;
	public static Long SEIS = 6L;
	public static Long SETE = 7L;
	public static Long OITO = 8L;

	public LongUtil() {
		//Garante que a classe não seja iniciada
	}
	public static Boolean isNullOrEmpty(Long valor) {
		if (valor.equals("") || valor.equals(null)) {
			return Boolean.TRUE;
		}
		return Boolean.FALSE;
	}
	
}
