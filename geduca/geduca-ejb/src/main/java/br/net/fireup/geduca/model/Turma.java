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
@Table(name = "tb_turma")
@SequenceGenerator(name = "gen_turma", sequenceName = "gen_turma", allocationSize = 1)

public class Turma implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_turma")
	@Column(name = "id_turma")
	private Long id;

	@Column(name = "cd_serie")
	private Long codigoSerie;

	@Column(name = "cd_turno")
	private Long codigoTurno;

	@Column(name = "cd_anoletivo")
	private Long codigoAnoLetivo;

	@Column(name = "tx_turma")
	private String descricao;

	@Column(name = "dt_manutencao")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataManutencao;

	@Column(name = "dt_cadastro")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataCadastro;

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

	public Long getCodigoAnoLetivo() {
		return codigoAnoLetivo;
	}

	public void setCodigoAnoLetivo(Long codigoAnoLetivo) {
		this.codigoAnoLetivo = codigoAnoLetivo;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public Date getDataManutencao() {
		return dataManutencao;
	}

	public void setDataManutencao(Date dataManutencao) {
		this.dataManutencao = dataManutencao;
	}

	public Date getDataCadastro() {
		return dataCadastro;
	}

	public void setDataCadastro(Date dataCadastro) {
		this.dataCadastro = dataCadastro;
	}

}
