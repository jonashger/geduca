package br.net.fireup.geduca.bo.impl;

import java.util.Date;
import java.util.logging.Logger;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.EmpresaBO;
import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.EmpresaDAO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Empresa;
import br.net.fireup.geduca.util.StringUtil;
import br.net.fireup.geduca.util.ValidadorUtil;

@Stateless
public class EmpresaBOImpl implements EmpresaBO {

	@Inject
	@LoggerUtil
	private Logger logger;

	@Inject
	private EmpresaDAO empresaDAO;

	@Override
	public ValorBooleanoDTO salvar(Empresa empresa) throws ServerException {
		logger.info("==> Executando o método salvar");

		if (StringUtil.isNullOrEmpty(empresa.getNomeFantasia()) || StringUtil.isNullOrEmpty(empresa.getRazaoSocial())) {
			throw Resource.getServerException(MensagemService.CAMPOS_NAO_INFORMADOS);
		}
		if (!ValidadorUtil.validaCnpj(empresa.getCnpj())) {
			throw Resource.getServerException(MensagemService.CNPJ_INFORMADO_INVALIDO);
		}

		empresa.setDataAlteracao(new Date());
		empresa.setDataCriacao(new Date());
		empresaDAO.salvar(empresa);
		return ValorBooleanoDTO.TRUE;
	}

}
