package br.net.fireup.geduca.dto;

import java.io.Serializable;

public class EmpresaDTO implements Serializable {

	private static final long serialVersionUID = 1L;

	private Long id;
	private Long codigoEmpresaPrincipal;
	private String cnpj;
	private String nome;
	private String nomeFantasia;
	private String telefone;
	private String telefoneCelular;
	private String email;
	private String rua;
	private String numeroRua;
	private String cep;
	private Long codigoBairro;
	private Long codigoCidade;
	private Long codigoEstado;
	private Long codigoPais;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getCnpj() {
		return cnpj;
	}

	public void setCnpj(String cnpj) {
		this.cnpj = cnpj;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getNomeFantasia() {
		return nomeFantasia;
	}

	public void setNomeFantasia(String nomeFantasia) {
		this.nomeFantasia = nomeFantasia;
	}

	public String getTelefone() {
		return telefone;
	}

	public void setTelefone(String telefone) {
		this.telefone = telefone;
	}

	public String getTelefoneCelular() {
		return telefoneCelular;
	}

	public void setTelefoneCelular(String telefoneCelular) {
		this.telefoneCelular = telefoneCelular;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getRua() {
		return rua;
	}

	public void setRua(String rua) {
		this.rua = rua;
	}

	public String getNumeroRua() {
		return numeroRua;
	}

	public void setNumeroRua(String numeroRua) {
		this.numeroRua = numeroRua;
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

	public Long getCodigoEmpresaPrincipal() {
		return codigoEmpresaPrincipal;
	}

	public void setCodigoEmpresaPrincipal(Long codigoEmpresaPrincipal) {
		this.codigoEmpresaPrincipal = codigoEmpresaPrincipal;
	}

	public String getCep() {
		return cep;
	}

	public void setCep(String cep) {
		this.cep = cep;
	}

}
