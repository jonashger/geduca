package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_mailserver")
public class MailServer implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "tx_host")
	private String host;

	@Column(name = "nr_portassl")
	private String ssl;

	@Column(name = "nr_portaNoSsl")
	private String noSsl;

	@Column(name = "tx_remetente")
	private String remetente;

	@Column(name = "tx_senha")
	private String senha;

	public String getHost() {
		return host;
	}

	public void setHost(String host) {
		this.host = host;
	}


	public String getSsl() {
		return ssl;
	}

	public void setSsl(String ssl) {
		this.ssl = ssl;
	}

	public String getNoSsl() {
		return noSsl;
	}

	public void setNoSsl(String noSsl) {
		this.noSsl = noSsl;
	}

	public String getRemetente() {
		return remetente;
	}

	public void setRemetente(String remetente) {
		this.remetente = remetente;
	}

	public String getSenha() {
		return senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}

	public String getNomeRemetente() {
		return nomeRemetente;
	}

	public void setNomeRemetente(String nomeRemetente) {
		this.nomeRemetente = nomeRemetente;
	}

	public Boolean getFlagSsl() {
		return flagSsl;
	}

	public void setFlagSsl(Boolean flagSsl) {
		this.flagSsl = flagSsl;
	}

	@Column(name = "tx_nomeremetente")
	private String nomeRemetente;

	@Column(name = "fl_ssl")
	private Boolean flagSsl;
	
}
