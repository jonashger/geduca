package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QSerie is a Querydsl query type for Serie
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QSerie extends EntityPathBase<Serie> {

    private static final long serialVersionUID = -498719740L;

    public static final QSerie serie1 = new QSerie("serie1");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath serie = createString("serie");

    public QSerie(String variable) {
        super(Serie.class, forVariable(variable));
    }

    public QSerie(Path<? extends Serie> path) {
        super(path.getType(), path.getMetadata());
    }

    public QSerie(PathMetadata<?> metadata) {
        super(Serie.class, metadata);
    }

}

