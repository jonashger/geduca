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
@Table(name = "tb_turno")
@SequenceGenerator(name = "gen_turno", sequenceName = "gen_turno", allocationSize = 1)

public class Turno implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_turno")
	@Column(name = "id_turno")
	private Long id;

	@Column(name = "cd_empresa")
	private Long codigoEmpresa;

	@Column(name = "dt_horainicio")
	@Temporal(TemporalType.TIME)
	private Date horaInicio;

	@Column(name = "dt_horafim")
	@Temporal(TemporalType.TIME)
	private Date horaFim;

	@Column(name = "dt_tempoaula")
	@Temporal(TemporalType.TIME)
	private Date tempoAula;

	@Column(name = "tx_descricao")
	private String descricao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getCodigoEmpresa() {
		return codigoEmpresa;
	}

	public void setCodigoEmpresa(Long codigoEmpresa) {
		this.codigoEmpresa = codigoEmpresa;
	}

	public Date getHoraInicio() {
		return horaInicio;
	}

	public void setHoraInicio(Date horaInicio) {
		this.horaInicio = horaInicio;
	}

	public Date getHoraFim() {
		return horaFim;
	}

	public void setHoraFim(Date horaFim) {
		this.horaFim = horaFim;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public Date getTempoAula() {
		return tempoAula;
	}

	public void setTempoAula(Date tempoAula) {
		this.tempoAula = tempoAula;
	}

}
