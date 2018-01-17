package br.net.fireup.geduca.model.pk;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Embeddable;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Embeddable
public class MatriculaLogPK implements Serializable {
	private static final long serialVersionUID = 1L;

	@Column(name = "cd_matricula", insertable = false, updatable = false)
	private Long codigoMatricula;

	@Column(name = "cd_empresa", insertable = false, updatable = false)
	private Long codigoEmpresa;

	@Column(name = "dt_log", insertable = false, updatable = false)
	@Temporal(TemporalType.DATE)
	private Date dataLog;

	public Long getCodigoMatricula() {
		return codigoMatricula;
	}

	public void setCodigoMatricula(Long codigoMatricula) {
		this.codigoMatricula = codigoMatricula;
	}

	public Long getCodigoEmpresa() {
		return codigoEmpresa;
	}

	public void setCodigoEmpresa(Long codigoEmpresa) {
		this.codigoEmpresa = codigoEmpresa;
	}

	public Date getDataLog() {
		return dataLog;
	}

	public void setDataLog(Date dataLog) {
		this.dataLog = dataLog;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((codigoEmpresa == null) ? 0 : codigoEmpresa.hashCode());
		result = prime * result + ((codigoMatricula == null) ? 0 : codigoMatricula.hashCode());
		result = prime * result + ((dataLog == null) ? 0 : dataLog.hashCode());
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
		MatriculaLogPK other = (MatriculaLogPK) obj;
		if (codigoEmpresa == null) {
			if (other.codigoEmpresa != null)
				return false;
		} else if (!codigoEmpresa.equals(other.codigoEmpresa))
			return false;
		if (codigoMatricula == null) {
			if (other.codigoMatricula != null)
				return false;
		} else if (!codigoMatricula.equals(other.codigoMatricula))
			return false;
		if (dataLog == null) {
			if (other.dataLog != null)
				return false;
		} else if (!dataLog.equals(other.dataLog))
			return false;
		return true;
	}
}
