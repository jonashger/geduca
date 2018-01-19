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

@Entity
@Table(name = "tb_ticketacesso")
@SequenceGenerator(name = "gen_ticketacesso", sequenceName = "gen_ticketacesso", allocationSize = 1)

public class TicketAcesso implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "gen_ticketacesso")
	@Column(name = "id_ticketacesso")
	private Long id;

	@Column(name = "cd_pessoa")
	private Long codigoPessoa;

	@Column(name = "tx_ticket")
	private String ticket;

	@Column(name = "dt_cadastro")
	private Date dataCadastro;

	@Column(name = "dt_manutencao")
	private Date dataManutencao;

}
