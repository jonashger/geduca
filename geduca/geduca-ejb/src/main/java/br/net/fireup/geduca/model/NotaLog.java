package br.net.fireup.geduca.model;

import java.io.Serializable;
import java.math.BigDecimal;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name = "tb_notalog")
public class NotaLog implements Serializable {
	private static final long serialVersionUID = 1L;
	@Id
	@Column(name = "id_notalog")
	private Long id;

	@Column(name = "cd_materia")
	private Long materia;

	@Column(name = "cd_pessoa")
	private Long pessoa;

	@Column(name = "dt_log")
	@Temporal(TemporalType.TIMESTAMP)
	private Date serie;

	@Column(name = "tx_nota")
	private String nota;

	@Column(name = "nr_nota")
	private BigDecimal numeroNota;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getMateria() {
		return materia;
	}

	public void setMateria(Long materia) {
		this.materia = materia;
	}

	public Long getPessoa() {
		return pessoa;
	}

	public void setPessoa(Long pessoa) {
		this.pessoa = pessoa;
	}

	public Date getSerie() {
		return serie;
	}

	public void setSerie(Date serie) {
		this.serie = serie;
	}

	public String getNota() {
		return nota;
	}

	public void setNota(String nota) {
		this.nota = nota;
	}

	public BigDecimal getNumeroNota() {
		return numeroNota;
	}

	public void setNumeroNota(BigDecimal numeroNota) {
		this.numeroNota = numeroNota;
	}

}
