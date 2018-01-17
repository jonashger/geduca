package br.net.fireup.geduca.model;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.EmbeddedId;
import javax.persistence.Entity;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

import br.net.fireup.geduca.model.pk.MatriculaLogPK;

@Entity
@Table(name = "tb_matriculalog")
public class MatriculaLog implements Serializable {
	private static final long serialVersionUID = 1L;

	@EmbeddedId
	private MatriculaLogPK id;

	@Column(name = "dt_matricula")
	@Temporal(TemporalType.DATE)
	private Date dataMatricula;

	public MatriculaLogPK getId() {
		return id;
	}

	public void setId(MatriculaLogPK id) {
		this.id = id;
	}

	public Date getDataMatricula() {
		return dataMatricula;
	}

	public void setDataMatricula(Date dataMatricula) {
		this.dataMatricula = dataMatricula;
	}

}
