package br.net.fireup.geduca.util;

import java.util.List;

public class ListUtil {

	public ListUtil() {

	}

	public static <T> Boolean isNullOrEmpty(List<T> list) {

		if (list != null && (list.size() > IntegerUtil.ZERO)) {
			return Boolean.TRUE;
		}

		return Boolean.FALSE;

	}

}
