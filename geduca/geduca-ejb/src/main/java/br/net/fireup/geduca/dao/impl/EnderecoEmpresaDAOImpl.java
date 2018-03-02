package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QBairro.bairro;
import static br.net.fireup.geduca.model.QCidade.cidade;
import static br.net.fireup.geduca.model.QEstado.estado;
import static br.net.fireup.geduca.model.QPais.pais;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.BooleanBuilder;
import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.EnderecoEmpresaDAO;
import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.model.EnderecoEmpresa;

public class EnderecoEmpresaDAOImpl extends GenericDAOImpl<EnderecoEmpresa> implements EnderecoEmpresaDAO {

	private static final long serialVersionUID = 1L;

	@Inject
	@Geduca
	private EntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public Boolean validarEndereco(EmpresaDTO empresaDTO) {
		JPASQLQuery query = sqlQuery().from(bairro, pais, estado, cidade);

		BooleanBuilder booleanBuilder = new BooleanBuilder();
		booleanBuilder.and(bairro.id.eq(empresaDTO.getCodigoBairro()));
		booleanBuilder.and(cidade.id.eq(bairro.codigoCidade));
		booleanBuilder.and(cidade.id.eq(empresaDTO.getCodigoCidade()));
		booleanBuilder.and(estado.id.eq(cidade.codigoEstado));
		booleanBuilder.and(estado.id.eq(empresaDTO.getCodigoEstado()));
		booleanBuilder.and(pais.id.eq(estado.codigoPais));
		booleanBuilder.and(pais.id.eq(empresaDTO.getCodigoPais()));
		query.where(booleanBuilder);
		return query.exists();

	}

}
