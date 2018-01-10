package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name = "tb_tiposexo")
public class TipoSexo implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@Column(name = "id_tiposexo")
	private Long id;

	@Column(name = "tx_tiposexo")
	private String descricao;

}
