package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_tipomateria")
public class TipoMateria implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_tipomateria")
	private Long id;

	@Column(name = "tx_tipomateria")
	private String tipoMateria;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getTipoMateria() {
		return tipoMateria;
	}

	public void setTipoMateria(String tipoMateria) {
		this.tipoMateria = tipoMateria;
	}

}
