package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QPessoa is a Querydsl query type for Pessoa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QPessoa extends EntityPathBase<Pessoa> {

    private static final long serialVersionUID = 1633709599L;

    public static final QPessoa pessoa = new QPessoa("pessoa");

    public final DateTimePath<java.util.Date> dataAlteracao = createDateTime("dataAlteracao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final DatePath<java.util.Date> dataNascimento = createDate("dataNascimento", java.util.Date.class);

    public final StringPath email = createString("email");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath login = createString("login");

    public final StringPath name = createString("name");

    public final StringPath senha = createString("senha");

    public QPessoa(String variable) {
        super(Pessoa.class, forVariable(variable));
    }

    public QPessoa(Path<? extends Pessoa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QPessoa(PathMetadata<?> metadata) {
        super(Pessoa.class, metadata);
    }

}

