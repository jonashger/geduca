package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QEnderecoPessoa is a Querydsl query type for EnderecoPessoa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QEnderecoPessoa extends EntityPathBase<EnderecoPessoa> {

    private static final long serialVersionUID = 1269043016L;

    public static final QEnderecoPessoa enderecoPessoa = new QEnderecoPessoa("enderecoPessoa");

    public final StringPath cep = createString("cep");

    public final NumberPath<Long> codigoBairro = createNumber("codigoBairro", Long.class);

    public final NumberPath<Long> codigoCidade = createNumber("codigoCidade", Long.class);

    public final NumberPath<Long> codigoEstado = createNumber("codigoEstado", Long.class);

    public final NumberPath<Long> codigoPais = createNumber("codigoPais", Long.class);

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final DateTimePath<java.util.Date> dataAlteracao = createDateTime("dataAlteracao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath rua = createString("rua");

    public final StringPath ruaNumero = createString("ruaNumero");

    public QEnderecoPessoa(String variable) {
        super(EnderecoPessoa.class, forVariable(variable));
    }

    public QEnderecoPessoa(Path<? extends EnderecoPessoa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QEnderecoPessoa(PathMetadata<?> metadata) {
        super(EnderecoPessoa.class, metadata);
    }

}

