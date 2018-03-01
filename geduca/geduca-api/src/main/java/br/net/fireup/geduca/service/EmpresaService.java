package br.net.fireup.geduca.service;

import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.ServerException;

@Path("/empresaService")
public interface EmpresaService {

	@POST
	@Path("/salvar")
	@Produces({ MediaType.APPLICATION_JSON })
	@Consumes({ MediaType.APPLICATION_JSON })
	public ValorBooleanoDTO salvar(EmpresaDTO pessoa) throws ServerException;

}
