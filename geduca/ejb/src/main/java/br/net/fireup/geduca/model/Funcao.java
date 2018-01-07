package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_funcao")
public class Funcao implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_funcao")
	private Long id;

	@Column(name = "cd_pessoa")
	private Long pessoa;

	@Column(name = "cd_tipofuncao")
	private Long tipoFuncao;

	@Column(name = "cd_tipo")
	private Long tipo;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getPessoa() {
		return pessoa;
	}

	public void setPessoa(Long pessoa) {
		this.pessoa = pessoa;
	}

	public Long getTipoFuncao() {
		return tipoFuncao;
	}

	public void setTipoFuncao(Long tipoFuncao) {
		this.tipoFuncao = tipoFuncao;
	}

	public Long getTipo() {
		return tipo;
	}

	public void setTipo(Long tipo) {
		this.tipo = tipo;
	}
}
