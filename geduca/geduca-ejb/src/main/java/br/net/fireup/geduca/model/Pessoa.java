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
@Table(name = "tb_pessoa")
@SequenceGenerator(name = "gen_pessoa", sequenceName = "gen_pessoa", allocationSize = 1)
public class Pessoa implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_pessoa")
	@Column(name = "id_pessoa")
	private Long id;

	@Column(name = "tx_nome")
	private String name;

	@Column(name = "tx_email")
	private String email;

	@Column(name = "tx_senha")
	private String senha;

	@Column(name = "tx_login")
	private String login;

	@Column(name = "dt_nascimento")
	@Temporal(TemporalType.DATE)
	private Date dataNascimento;

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

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
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

	public String getSenha() {
		return senha;
	}

	public void setSenha(String senha) {
		this.senha = senha;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public Date getDataNascimento() {
		return dataNascimento;
	}

	public void setDataNascimento(Date dataNascimento) {
		this.dataNascimento = dataNascimento;
	}

}
