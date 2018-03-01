package br.net.fireup.geduca.util;

public class StringUtil {

	public static final String STRING_VAZIA = "";

	public static Boolean isNullOrEmpty(String string) {
		if (string == null || string.length() == 0) {
			return Boolean.TRUE;
		}

		return Boolean.FALSE;

	}

	public static String removerNaoNumeros(String cnpj) {
		if (!isNullOrEmpty(cnpj)) {
			return cnpj.replaceAll("[^0-9]", "");
		}
		return "";
	}

}
