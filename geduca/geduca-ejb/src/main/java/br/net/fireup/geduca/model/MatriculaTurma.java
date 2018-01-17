package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.EmbeddedId;
import javax.persistence.Entity;
import javax.persistence.Table;

import br.net.fireup.geduca.model.pk.MatriculaTurmaPK;

@Entity
@Table(name = "tb_matriculaturma")
public class MatriculaTurma implements Serializable {
	private static final long serialVersionUID = 1L;

	@EmbeddedId
	private MatriculaTurmaPK id;

	public MatriculaTurmaPK getId() {
		return id;
	}

	public void setId(MatriculaTurmaPK id) {
		this.id = id;
	}

}
