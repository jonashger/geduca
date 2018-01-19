package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_serie")
public class Serie implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_serie")
	private Long id;

	@Column(name = "tx_serie")
	private String serie;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getSerie() {
		return serie;
	}

	public void setSerie(String serie) {
		this.serie = serie;
	}

}
