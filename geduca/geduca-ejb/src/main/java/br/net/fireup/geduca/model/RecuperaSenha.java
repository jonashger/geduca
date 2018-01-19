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
@SequenceGenerator(name = "gen_recuperasenha", sequenceName = "gen_recuperasenha", allocationSize = 1)
@Table(name = "tb_recuperasenha")
public class RecuperaSenha implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_recuperasenha")
	@Column(name = "id_recuperasenha")
	private Long id;

	@Column(name = "cd_pessoa")
	private Long pessoa;

	@Column(name = "tx_token")
	private String token;

	@Column(name = "cd_ativo")
	private Long ativo;

	@Column(name = "dt_solicitacao")
	@Temporal(TemporalType.TIMESTAMP)
	private Date dataSolicitacao;

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getToken() {
		return token;
	}

	public void setToken(String token) {
		this.token = token;
	}

	public Long getAtivo() {
		return ativo;
	}

	public void setAtivo(Long ativo) {
		this.ativo = ativo;
	}

	public Date getDataSolicitacao() {
		return dataSolicitacao;
	}

	public void setDataSolicitacao(Date dataSolicitacao) {
		this.dataSolicitacao = dataSolicitacao;
	}
}
