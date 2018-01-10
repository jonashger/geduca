package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_estado")
public class Estado implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_estado")
	private Long id;

	@Column(name = "cd_pais")
	private Long codigoPais;

	@Column(name = "tx_estado")
	private String nome;

	@Column(name = "tx_sigla")
	private String sigla;

	@Column(name = "cd_ibge")
	private String ibge;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public Long getCodigoPais() {
		return codigoPais;
	}

	public void setCodigoPais(Long codigoPais) {
		this.codigoPais = codigoPais;
	}

	public String getSigla() {
		return sigla;
	}

	public void setSigla(String sigla) {
		this.sigla = sigla;
	}

	public String getIbge() {
		return ibge;
	}

	public void setIbge(String ibge) {
		this.ibge = ibge;
	}

}
