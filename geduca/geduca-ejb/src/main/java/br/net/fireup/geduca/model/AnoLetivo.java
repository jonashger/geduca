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
@Table(name = "tb_anoletivo")
@SequenceGenerator(name = "gen_anoletivo", sequenceName = "gen_anoletivo", allocationSize = 1)
public class AnoLetivo implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_anoletivo")
	@Column(name = "id_anoletivo")
	private Long id;

	@Column(name = "cd_tipoanoletivo")
	private Long tipoAnoLetivo;

	@Column(name = "dt_periodoinicio")
	@Temporal(TemporalType.DATE)
	private Date periodoInicio;

	@Column(name = "dt_periodofim")
	@Temporal(TemporalType.DATE)
	private Date periodoFim;

	@Column(name = "nr_totaldatas")
	private Long totalDatas;

	public Long getId() {
		return id;
	}

	public Long getTipoAnoLetivo() {
		return tipoAnoLetivo;
	}

	public void setTipoAnoLetivo(Long tipoAnoLetivo) {
		this.tipoAnoLetivo = tipoAnoLetivo;
	}

	public Date getPeriodoInicio() {
		return periodoInicio;
	}

	public void setPeriodoInicio(Date periodoInicio) {
		this.periodoInicio = periodoInicio;
	}

	public Date getPeriodoFim() {
		return periodoFim;
	}

	public void setPeriodoFim(Date periodoFim) {
		this.periodoFim = periodoFim;
	}

	public Long getTotalDatas() {
		return totalDatas;
	}

	public void setTotalDatas(Long totalDatas) {
		this.totalDatas = totalDatas;
	}

	public void setId(Long id) {
		this.id = id;
	}

}
