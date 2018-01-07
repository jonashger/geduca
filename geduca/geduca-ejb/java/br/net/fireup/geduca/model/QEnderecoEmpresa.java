package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QEnderecoEmpresa is a Querydsl query type for EnderecoEmpresa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QEnderecoEmpresa extends EntityPathBase<EnderecoEmpresa> {

    private static final long serialVersionUID = -260754168L;

    public static final QEnderecoEmpresa enderecoEmpresa = new QEnderecoEmpresa("enderecoEmpresa");

    public final StringPath cep = createString("cep");

    public final NumberPath<Long> codigoBairro = createNumber("codigoBairro", Long.class);

    public final NumberPath<Long> codigoCidade = createNumber("codigoCidade", Long.class);

    public final NumberPath<Long> codigoEmpresa = createNumber("codigoEmpresa", Long.class);

    public final NumberPath<Long> codigoEstado = createNumber("codigoEstado", Long.class);

    public final NumberPath<Long> codigoPais = createNumber("codigoPais", Long.class);

    public final DateTimePath<java.util.Date> dataAlteracao = createDateTime("dataAlteracao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath rua = createString("rua");

    public final StringPath ruaNumero = createString("ruaNumero");

    public QEnderecoEmpresa(String variable) {
        super(EnderecoEmpresa.class, forVariable(variable));
    }

    public QEnderecoEmpresa(Path<? extends EnderecoEmpresa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QEnderecoEmpresa(PathMetadata<?> metadata) {
        super(EnderecoEmpresa.class, metadata);
    }

}

