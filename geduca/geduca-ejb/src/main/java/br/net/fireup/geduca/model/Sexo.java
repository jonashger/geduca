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
@Table(name = "tb_sexo")
@SequenceGenerator(name = "gen_sexo", sequenceName = "gen_sexo", allocationSize = 1)
public class Sexo implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_sexo")
	@Column(name = "id_sexo")
	private Long id;

	@Column(name = "cd_tiposexo")
	private Long codigoTipoSexo;

	@Column(name = "cd_pessoa")
	private Long codigoPessoa;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getCodigoTipoSexo() {
		return codigoTipoSexo;
	}

	public void setCodigoTipoSexo(Long codigoTipoSexo) {
		this.codigoTipoSexo = codigoTipoSexo;
	}

	public Long getCodigoPessoa() {
		return codigoPessoa;
	}

	public void setCodigoPessoa(Long codigoPessoa) {
		this.codigoPessoa = codigoPessoa;
	}
}
