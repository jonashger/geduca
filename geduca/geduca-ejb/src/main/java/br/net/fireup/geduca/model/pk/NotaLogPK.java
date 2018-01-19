package br.net.fireup.geduca.model.pk;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Embeddable;

@Embeddable
public class NotaLogPK implements Serializable {
	private static final long serialVersionUID = 1L;
	// TODO
	@Column(name = "id_notalog", insertable = false, updatable = false)
	private Long codigoMatricula;

	@Column(name = "cd_turma", insertable = false, updatable = false)
	private Long codigoTurma;

	public Long getCodigoMatricula() {
		return codigoMatricula;
	}

	public void setCodigoMatricula(Long codigoMatricula) {
		this.codigoMatricula = codigoMatricula;
	}

	public Long getCodigoTurma() {
		return codigoTurma;
	}

	public void setCodigoTurma(Long codigoTurma) {
		this.codigoTurma = codigoTurma;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((codigoMatricula == null) ? 0 : codigoMatricula.hashCode());
		result = prime * result + ((codigoTurma == null) ? 0 : codigoTurma.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		NotaLogPK other = (NotaLogPK) obj;
		if (codigoMatricula == null) {
			if (other.codigoMatricula != null)
				return false;
		} else if (!codigoMatricula.equals(other.codigoMatricula))
			return false;
		if (codigoTurma == null) {
			if (other.codigoTurma != null)
				return false;
		} else if (!codigoTurma.equals(other.codigoTurma))
			return false;
		return true;
	}
}
