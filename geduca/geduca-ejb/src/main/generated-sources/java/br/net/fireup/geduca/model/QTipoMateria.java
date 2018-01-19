package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoMateria is a Querydsl query type for TipoMateria
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoMateria extends EntityPathBase<TipoMateria> {

    private static final long serialVersionUID = 754943641L;

    public static final QTipoMateria tipoMateria1 = new QTipoMateria("tipoMateria1");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath tipoMateria = createString("tipoMateria");

    public QTipoMateria(String variable) {
        super(TipoMateria.class, forVariable(variable));
    }

    public QTipoMateria(Path<? extends TipoMateria> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoMateria(PathMetadata<?> metadata) {
        super(TipoMateria.class, metadata);
    }

}

