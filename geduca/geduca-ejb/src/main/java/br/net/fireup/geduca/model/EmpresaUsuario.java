package br.net.fireup.geduca.model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.EmbeddedId;
import javax.persistence.Entity;
import javax.persistence.Table;

import br.net.fireup.geduca.model.pk.EmpresaUsuarioPK;

@Entity
@Table(name = "tb_empresausuario")
public class EmpresaUsuario implements Serializable {
	private static final long serialVersionUID = 1L;

	@EmbeddedId
	private EmpresaUsuarioPK id;

	@Column(name = "cd_funcao")
	private Long codigoFuncao;

	public Long getCodigoFuncao() {
		return codigoFuncao;
	}

	public void setCodigoFuncao(Long codigoFuncao) {
		this.codigoFuncao = codigoFuncao;
	}

}
