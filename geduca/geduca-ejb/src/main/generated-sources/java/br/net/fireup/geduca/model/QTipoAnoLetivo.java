package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QTipoAnoLetivo is a Querydsl query type for TipoAnoLetivo
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QTipoAnoLetivo extends EntityPathBase<TipoAnoLetivo> {

    private static final long serialVersionUID = 177734429L;

    public static final QTipoAnoLetivo tipoAnoLetivo = new QTipoAnoLetivo("tipoAnoLetivo");

    public final NumberPath<Long> ano = createNumber("ano", Long.class);

    public final StringPath descricao = createString("descricao");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public QTipoAnoLetivo(String variable) {
        super(TipoAnoLetivo.class, forVariable(variable));
    }

    public QTipoAnoLetivo(Path<? extends TipoAnoLetivo> path) {
        super(path.getType(), path.getMetadata());
    }

    public QTipoAnoLetivo(PathMetadata<?> metadata) {
        super(TipoAnoLetivo.class, metadata);
    }

}

