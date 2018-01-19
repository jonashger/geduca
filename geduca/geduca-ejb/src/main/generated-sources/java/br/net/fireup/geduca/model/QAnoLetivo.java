package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QAnoLetivo is a Querydsl query type for AnoLetivo
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QAnoLetivo extends EntityPathBase<AnoLetivo> {

    private static final long serialVersionUID = -1259446287L;

    public static final QAnoLetivo anoLetivo = new QAnoLetivo("anoLetivo");

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final DatePath<java.util.Date> periodoFim = createDate("periodoFim", java.util.Date.class);

    public final DatePath<java.util.Date> periodoInicio = createDate("periodoInicio", java.util.Date.class);

    public final NumberPath<Long> tipoAnoLetivo = createNumber("tipoAnoLetivo", Long.class);

    public final NumberPath<Long> totalDatas = createNumber("totalDatas", Long.class);

    public QAnoLetivo(String variable) {
        super(AnoLetivo.class, forVariable(variable));
    }

    public QAnoLetivo(Path<? extends AnoLetivo> path) {
        super(path.getType(), path.getMetadata());
    }

    public QAnoLetivo(PathMetadata<?> metadata) {
        super(AnoLetivo.class, metadata);
    }

}

