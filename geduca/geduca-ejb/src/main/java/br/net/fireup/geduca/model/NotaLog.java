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
@Table(name = "tb_serie")
public class NotaLog implements Serializable {
	private static final long serialVersionUID = 1L;
	// TODO
	@Id
	@Column(name = "dt_log")
	private Long id;

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

}
