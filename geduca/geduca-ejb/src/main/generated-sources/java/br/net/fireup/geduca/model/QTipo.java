package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipo is a Querydsl query type for Tipo
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipo extends EntityPathBase<Tipo> {

    private static final long serialVersionUID = 1923608492L;

    public static final QTipo tipo = new QTipo("tipo");

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipo(String variable) {
        super(Tipo.class, forVariable(variable));
    }

    public QTipo(Path<? extends Tipo> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipo(PathMetadata<?> metadata) {
        super(Tipo.class, metadata);
    }

}

