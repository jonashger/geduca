package br.net.fireup.geduca.interceptador;

import java.util.Map;
import java.util.logging.Logger;

import br.net.fireup.geduca.util.StringUtil;

public class Resource {
	private Resource() {

	}

	public static ServerException getServerException(String property, Map<String, String> valores) {
		String mensagem = getMensagem(ManageProperties.getPropertyUsuario(property), valores);
		logarExcecao(property + " - " + mensagem);
		return new ServerException(property, mensagem);
	}

	private static void logarExcecao(String string) {
		Logger.getLogger(Resource.class.getName()).severe(string);

	}

	private static String getMensagem(String property, Map<String, String> valores) {

		return processarMensagem(property, valores);
	}

	private static String processarMensagem(String property, Map<String, String> valores) {

		String mensagem = property;

		if (valores != null) {
			for (Map.Entry<String, String> entry : valores.entrySet()) {
				String valor = entry.getValue() == null ? "null" : entry.getValue();
				String key = entry.getKey().replace("{", StringUtil.STRING_VAZIA).replace("}", StringUtil.STRING_VAZIA)
						.replace("[", StringUtil.STRING_VAZIA).replace("]", StringUtil.STRING_VAZIA);
				mensagem = mensagem.replaceAll("(\\[" + key + "\\])", "[" + key + "=" + valor + "]");
				mensagem = mensagem.replace("{" + key + "}", valor);
			}
		}
		return mensagem;
	}

	public static ServerException getServerException(String property) {
		String mensagem = getMensagem(ManageProperties.getPropertyUsuario(property), null);
		logarExcecao(property + " - " + mensagem);
		return new ServerException(property, mensagem);
	}

}
