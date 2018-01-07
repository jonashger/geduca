package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_tipofuncao")
public class TipoFuncao implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_tipofuncao")
	private Long id;

	@Column(name = "tx_tipofuncao")
	private String descricao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

}
