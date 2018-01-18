package br.net.fireup.geduca.model;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name = "tb_matricula")
@SequenceGenerator(name = "gen_matricula", sequenceName = "gen_matricula", allocationSize = 1)

public class Matricula implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_matricula")
	@Column(name = "id_matricula")
	private Long id;

	@Column(name = "cd_escola")
	private Long codigoSerie;

	@Column(name = "cd_aluno")
	private Long codigoTurno;

	@Column(name = "dt_matricula")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataMatricula;

	@Column(name = "dt_cadastro")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataCriacao;

	@Column(name = "dt_manutencao")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataManutencao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getCodigoSerie() {
		return codigoSerie;
	}

	public void setCodigoSerie(Long codigoSerie) {
		this.codigoSerie = codigoSerie;
	}

	public Long getCodigoTurno() {
		return codigoTurno;
	}

	public void setCodigoTurno(Long codigoTurno) {
		this.codigoTurno = codigoTurno;
	}

	public Date getDataMatricula() {
		return dataMatricula;
	}

	public void setDataMatricula(Date dataMatricula) {
		this.dataMatricula = dataMatricula;
	}

	public Date getDataCriacao() {
		return dataCriacao;
	}

	public void setDataCriacao(Date dataCriacao) {
		this.dataCriacao = dataCriacao;
	}

	public Date getDataManutencao() {
		return dataManutencao;
	}

	public void setDataManutencao(Date dataManutencao) {
		this.dataManutencao = dataManutencao;
	}
}
