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
@Table(name = "tb_contatoempresa")
@SequenceGenerator(name = "gen_contatoempresa", sequenceName = "gen_contatoempresa", allocationSize = 1)
public class ContatoEmpresa implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.AUTO, generator = "gen_contatoempresa")
	@Column(name = "id_contatoempresa")
	private Long id;

	@Column(name = "cd_empresa")
	private Long codigoEmpresa;

	@Column(name = "cd_tipocontato")
	private Long codigoTipoContato;

	@Column(name = "tx_contato")
	private String descricao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Long getCodigoEmpresa() {
		return codigoEmpresa;
	}

	public void setCodigoEmpresa(Long codigoEmpresa) {
		this.codigoEmpresa = codigoEmpresa;
	}

	public Long getCodigoTipoContato() {
		return codigoTipoContato;
	}

	public void setCodigoTipoContato(Long codigoTipoContato) {
		this.codigoTipoContato = codigoTipoContato;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

}
