package br.net.fireup.geduca.util;

public class StringUtil {

	public static Boolean isNullOrEmpty(String string) {
		if (string == null || string.length() == 0) {
			return Boolean.TRUE;
		}

		return Boolean.FALSE;

	}

}
