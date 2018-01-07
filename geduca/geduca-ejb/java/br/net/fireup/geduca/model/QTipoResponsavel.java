package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoResponsavel is a Querydsl query type for TipoResponsavel
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoResponsavel extends EntityPathBase<TipoResponsavel> {

    private static final long serialVersionUID = 88040180L;

    public static final QTipoResponsavel tipoResponsavel = new QTipoResponsavel("tipoResponsavel");

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipoResponsavel(String variable) {
        super(TipoResponsavel.class, forVariable(variable));
    }

    public QTipoResponsavel(Path<? extends TipoResponsavel> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoResponsavel(PathMetadata<?> metadata) {
        super(TipoResponsavel.class, metadata);
    }

}

