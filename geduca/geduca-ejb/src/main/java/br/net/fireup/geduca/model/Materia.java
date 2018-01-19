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
@Table(name = "tb_materia")
@SequenceGenerator(name = "gen_materia", sequenceName = "gen_materia", allocationSize = 1)

public class Materia implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_materia")
	@Column(name = "id_materia")
	private Long id;

	@Column(name = "cd_materiapadrao")
	private String codigoMateriaPadrao;

	@Column(name = "cd_pessoa")
	private Long codigoPessoa;

	@Column(name = "cd_turma")
	private Long codigoTurma;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getCodigoMateriaPadrao() {
		return codigoMateriaPadrao;
	}

	public void setCodigoMateriaPadrao(String codigoMateriaPadrao) {
		this.codigoMateriaPadrao = codigoMateriaPadrao;
	}

	public Long getCodigoPessoa() {
		return codigoPessoa;
	}

	public void setCodigoPessoa(Long codigoPessoa) {
		this.codigoPessoa = codigoPessoa;
	}

	public Long getCodigoTurma() {
		return codigoTurma;
	}

	public void setCodigoTurma(Long codigoTurma) {
		this.codigoTurma = codigoTurma;
	}
}
