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
@Table(name = "tb_materiapadrao")
@SequenceGenerator(name = "gen_materiapadrao", sequenceName = "gen_materiapadrao", allocationSize = 1)

public class MateriaPadrao implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_materiapadrao")
	@Column(name = "id_materiapadrao")
	private Long id;

	@Column(name = "tx_materiapadrao")
	private String materiaPadrao;

	@Column(name = "cd_tipomateria")
	private Long codigoMateria;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getMateriaPadrao() {
		return materiaPadrao;
	}

	public void setMateriaPadrao(String materiaPadrao) {
		this.materiaPadrao = materiaPadrao;
	}

	public Long getCodigoMateria() {
		return codigoMateria;
	}

	public void setCodigoMateria(Long codigoMateria) {
		this.codigoMateria = codigoMateria;
	}
}
