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
@Table(name = "tb_responsavel")
@SequenceGenerator(name = "gen_responsavel", sequenceName = "gen_responsavel", allocationSize = 1)
public class Responsavel implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_responsavel")
	@Column(name = "id_responsavel")
	private Long id;

	@Column(name = "cd_pessoa")
	private Long codigoPessoa;

	@Column(name = "cd_tiporesponsavel")
	private Long codigoTipoResponsavel;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getCodigoPessoa() {
		return codigoPessoa;
	}

	public void setCodigoPessoa(Long codigoPessoa) {
		this.codigoPessoa = codigoPessoa;
	}

	public Long getCodigoTipoResponsavel() {
		return codigoTipoResponsavel;
	}

	public void setCodigoTipoResponsavel(Long codigoTipoResponsavel) {
		this.codigoTipoResponsavel = codigoTipoResponsavel;
	}

}
