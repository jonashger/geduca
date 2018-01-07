package br.net.fireup.geduca.bo;

import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;

public interface PessoaBO {

	public abstract ValorBooleanoDTO registrarPessoa(Pessoa pessoa);
}
