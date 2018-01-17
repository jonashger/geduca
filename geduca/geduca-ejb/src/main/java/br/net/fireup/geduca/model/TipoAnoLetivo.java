package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;

@Entity
@Table(name = "tb_tipoanoletivo")
@SequenceGenerator(name = "gen_tipoanoletivo", sequenceName = "gen_tipoanoletivo", allocationSize = 1)
public class TipoAnoLetivo implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_tipoanoletivo")
	@Column(name = "id_tipoanoletivo")
	private Long id;

	@Column(name = "tx_descricao")
	private String descricao;

	@Column(name = "cd_ano")
	private Long ano;

	public Long getId() {
		return id;
	}

	public Long getAno() {
		return ano;
	}

	public void setAno(Long ano) {
		this.ano = ano;
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
