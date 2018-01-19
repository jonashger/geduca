package br.net.fireup.geduca.service;

import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import br.net.fireup.geduca.dto.LoginDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;

@Path("/pessoaService")
public interface PessoaService {

	@POST
	@Path("/registrar")
	@Produces({ MediaType.APPLICATION_JSON })
	@Consumes({ MediaType.APPLICATION_JSON })
	public ValorBooleanoDTO registrarPessoa(Pessoa pessoa);

	@POST
	@Path("/login")
	@Produces({ MediaType.APPLICATION_JSON })
	@Consumes({ MediaType.APPLICATION_JSON })
	public ValorBooleanoDTO realizarLogin(LoginDTO Login);
}
