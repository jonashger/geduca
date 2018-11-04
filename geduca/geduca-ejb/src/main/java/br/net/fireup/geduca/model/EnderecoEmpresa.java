package br.net.fireup.geduca.model;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;

@Entity
@Table(name = "tb_enderecoempresa")
@SequenceGenerator(name = "gen_enderecoempresa", sequenceName = "gen_enderecoempresa", allocationSize = 1)

public class EnderecoEmpresa implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_enderecoempresa")
	@Column(name = "id_enderecoempresa")
	private Long id;

	@Column(name = "cd_empresa")
	private Long codigoEmpresa;

	@Column(name = "cd_bairro")
	private Long codigoBairro;

	@Column(name = "cd_cidade")
	private Long codigoCidade;

	@Column(name = "cd_estado")
	private Long codigoEstado;

	@Column(name = "cd_pais")
	private Long codigoPais;

	@Column(name = "tx_rua")
	private String rua;

	@Column(name = "tx_ruanumero")
	private String ruaNumero;

	@Column(name = "cd_cep")
	private String cep;

	@Column(name = "dt_criacao")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataCriacao;

	@Column(name = "dt_alteracao")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataAlteracao;

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

	public Long getCodigoBairro() {
		return codigoBairro;
	}

	public void setCodigoBairro(Long codigoBairro) {
		this.codigoBairro = codigoBairro;
	}

	public Long getCodigoCidade() {
		return codigoCidade;
	}

	public void setCodigoCidade(Long codigoCidade) {
		this.codigoCidade = codigoCidade;
	}

	public Long getCodigoEstado() {
		return codigoEstado;
	}

	public void setCodigoEstado(Long codigoEstado) {
		this.codigoEstado = codigoEstado;
	}

	public Long getCodigoPais() {
		return codigoPais;
	}

	public void setCodigoPais(Long codigoPais) {
		this.codigoPais = codigoPais;
	}

	public String getRua() {
		return rua;
	}

	public void setRua(String rua) {
		this.rua = rua;
	}

	public String getRuaNumero() {
		return ruaNumero;
	}

	public void setRuaNumero(String ruaNumero) {
		this.ruaNumero = ruaNumero;
	}

	public String getCep() {
		return cep;
	}

	public void setCep(String cep) {
		this.cep = cep;
	}

	public Date getDataCriacao() {
		return dataCriacao;
	}

	public void setDataCriacao(Date dataCriacao) {
		this.dataCriacao = dataCriacao;
	}

	public Date getDataAlteracao() {
		return dataAlteracao;
	}

	public void setDataAlteracao(Date dataAlteracao) {
		this.dataAlteracao = dataAlteracao;
	}
}
