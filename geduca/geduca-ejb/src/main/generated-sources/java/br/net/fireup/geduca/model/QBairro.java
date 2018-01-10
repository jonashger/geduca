package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QBairro is a Querydsl query type for Bairro
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QBairro extends EntityPathBase<Bairro> {

    private static final long serialVersionUID = 1228908637L;

    public static final QBairro bairro = new QBairro("bairro");

    public final NumberPath<Long> codigoCidade = createNumber("codigoCidade", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath nome = createString("nome");

    public QBairro(String variable) {
        super(Bairro.class, forVariable(variable));
    }

    public QBairro(Path<? extends Bairro> path) {
        super(path.getType(), path.getMetadata());
    }

    public QBairro(PathMetadata<?> metadata) {
        super(Bairro.class, metadata);
    }

}

