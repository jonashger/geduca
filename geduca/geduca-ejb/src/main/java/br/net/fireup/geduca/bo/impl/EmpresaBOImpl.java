package br.net.fireup.geduca.bo.impl;

import java.util.Date;
import java.util.logging.Logger;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.EmpresaBO;
import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.EmpresaDAO;
import br.net.fireup.geduca.dao.EnderecoEmpresaDAO;
import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Empresa;
import br.net.fireup.geduca.model.EnderecoEmpresa;
import br.net.fireup.geduca.util.LongUtil;
import br.net.fireup.geduca.util.StringUtil;
import br.net.fireup.geduca.util.ValidadorUtil;

@Stateless
public class EmpresaBOImpl implements EmpresaBO {

	@Inject
	@LoggerUtil
	private Logger logger;

	@Inject
	private EmpresaDAO empresaDAO;

	@Inject
	private EnderecoEmpresaDAO enderecoEmpresaDAO;

	@Override
	public ValorBooleanoDTO salvar(EmpresaDTO empresaDTO) throws ServerException {
		logger.info("==> Executando o método salvar");

		if (StringUtil.isNullOrEmpty(empresaDTO.getNomeFantasia()) || StringUtil.isNullOrEmpty(empresaDTO.getNome())
				|| LongUtil.isNullOrEmpty(empresaDTO.getCodigoBairro())
				|| LongUtil.isNullOrEmpty(empresaDTO.getCodigoCidade())
				|| LongUtil.isNullOrEmpty(empresaDTO.getCodigoEstado())
				|| LongUtil.isNullOrEmpty(empresaDTO.getCodigoPais()) || StringUtil.isNullOrEmpty(empresaDTO.getRua())
				|| LongUtil.isNullOrEmpty(empresaDTO.getCodigoPais())) {
			throw Resource.getServerException(MensagemService.CAMPOS_NAO_INFORMADOS);
		}
		if (!ValidadorUtil.validaCnpj(empresaDTO.getCnpj())) {
			throw Resource.getServerException(MensagemService.CNPJ_INFORMADO_INVALIDO);
		}

		if (!enderecoEmpresaDAO.validarEndereco(empresaDTO)) {
			throw Resource.getServerException(MensagemService.CAMPOS_NAO_INFORMADOS);
		}

		Empresa empresa = empresaDAO.buscarPorCnpj(StringUtil.removerNaoNumeros(empresaDTO.getCnpj()));

		if (empresa == null) {
			empresa = new Empresa();
			empresa.setDataCriacao(new Date());
		}
		empresa.setCnpj(empresaDTO.getCnpj());
		empresa.setNomeFantasia(empresaDTO.getNomeFantasia());
		empresa.setRazaoSocial(empresaDTO.getNome());
		empresa.setEmpresaPrincipal(empresaDTO.getCodigoEmpresaPrincipal());
		empresa.setDataAlteracao(new Date());
		empresa = empresaDAO.salvar(empresa);

		EnderecoEmpresa endereco = empresaDAO.adquirirEndereco(empresa.getId());

		if (endereco == null) {
			endereco = new EnderecoEmpresa();
			endereco.setDataCriacao(new Date());
		}

		endereco.setCep(empresaDTO.getCep());
		endereco.setCodigoBairro(empresaDTO.getCodigoBairro());
		endereco.setCodigoCidade(empresaDTO.getCodigoCidade());
		endereco.setCodigoEmpresa(empresa.getId());
		endereco.setCodigoEstado(empresaDTO.getCodigoEstado());
		endereco.setCodigoPais(empresaDTO.getCodigoPais());
		endereco.setRua(empresaDTO.getRua());
		endereco.setRuaNumero(empresaDTO.getNumeroRua());
		endereco.setDataAlteracao(new Date());

		endereco = enderecoEmpresaDAO.salvar(endereco);

		return ValorBooleanoDTO.TRUE;
	}

}
